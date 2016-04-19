import requests, re, datetime, psycopg2, datetime, time, MySQLdb
from random import randint

db = psycopg2.connect(host="pga.key.biz.tr", port="5432", user="analiz", password="4n4l1z#", database="referans")
db.autocommit = True
cur = db.cursor()

# db_mysql = MySQLdb.connect("160.153.16.65", "omer_wpte", "y1969Mer!", "wpte_project")
# cur_mysql = db_mysql.cursor()

# ASDFA

sql = "SELECT * FROM tags"
cur.execute(sql)

qwe = cur.fetchall()

f = open('tag_db.txt','w')
for q in qwe:

    data = q[1].strip() + "*" + str(q[2]) + "*" + str(q[3]) + "\r\n"
    f.write(data) # python will convert \n to os.linesep
    # sdfsdfs

    # print q[3]
    # cur_mysql.execute("INSERT INTO hebele VALUE (\"q[1].strip()\")")
f.close()



