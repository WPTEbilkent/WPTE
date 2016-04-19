import requests, re, datetime, psycopg2, datetime, time
from random import randint
# import MySQLdb
# from mysql.connector import (connection)

print " \n\n-- YouTestify tag gathering duty --"

rand = randint(0, 2)
print "Delay for " + str(rand) + " seconds"
time.sleep(rand)

start_time = time.time()
ts = time.time()
dt = datetime.datetime.fromtimestamp(ts).strftime('%Y-%m-%d %H:%M:%S')
print "\n" + dt

base_url = 'http://stackoverflow.com/tags?'

db = psycopg2.connect(host="pga.key.biz.tr", port="5432", user="analiz", password="4n4l1z#", database="referans")
db.autocommit = True
cur = db.cursor()

def getResource(url):
    s = requests.session()
    r=s.get(url)
    return " ".join(r.text.split())

def findCurrentPage():
    sql = 'SELECT page FROM "tags" ORDER BY "page" DESC'
    cur.execute(sql)
    rows = cur.fetchall()
    try:
        return rows[0][0] + 1
    except IndexError:
        return 0

def findLastPage():
    data = getResource(base_url)
    last_page = re.findall('<span class="page-numbers dots">.*page-numbers">(.*?)</span>', data)
    return last_page[0]

page = findCurrentPage()
print page
if page <= findLastPage():
    exit()

for j in range(0, 5):
    current_page = page + j
    url = base_url + 'page=%s&tab=popular' %current_page
    print "\nCurrent Page => " + str(current_page)
    print url + "\n"

    data = getResource(url)

    # f = open('tag_data.txt','w')
    # f.write(data.encode('utf-8')) # python will convert \n to os.linesep
    # f.close()

    tags_data = re.findall('<td class="tag-cell"> <a href=(.*?)<div class="cbt"></div> </div> </td>', data)
    tags = []

    for i in range(0, len(tags_data)):
        a = re.findall('rel="tag">(?:<img.*sponsor-tag-img">)?(.*?)</a>(?:<span class="item-multiplier"><span class="item-multiplier-x">&times;</span>&nbsp;<span class="item-multiplier-count">(.*?)</span>)?', tags_data[i])
        tag = {'name': a[0][0], 'count': a[0][1]}

        if tag['count'] == "":
            tag['count'] = 0

        tags.append(tag)

    for tag in tags:
        sql = 'INSERT INTO tags (name, count, date, page) VALUES (\'%s\', %s, now()::date, %s );' %(tag['name'], tag['count'], current_page)
        # print sql
        cur.execute(sql)

    db.commit()
    time.sleep(randint(0, 10))

db.close()

print("\n--- %s seconds ---" % (time.time() - start_time))

