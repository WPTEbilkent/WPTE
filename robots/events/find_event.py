# -*-coding:utf8-*-
print "Content-type: text/html;charset=utf-8\n\n"

import requests, re, pprint, MySQLdb, datetime
from HTMLParser import HTMLParser
from datetime import datetime

db = MySQLdb.connect("localhost","root","y1969Mer!","youtestify")

# prepare a cursor object using cursor() method
cursor = db.cursor()
cursor.execute('SET NAMES utf8')

date = datetime.now()
current_date = date.strftime('%Y/%m/%d %H:%M:%S')
print current_date

class MLStripper(HTMLParser):
    def __init__(self):
        # initialize the base class
        HTMLParser.__init__(self)

    def read(self, data):
        # clear the current output before re-use
        self._lines = []
        # re-set the parser's state before re-use
        self.reset()
        self.feed(data)
        return ''.join(self._lines)

    def handle_data(self, d):
        self._lines.append(d)


def htmlParser(html):
    s = MLStripper()
    return s.read(html)


content = []

print "\nturkishtestingboard"
print "---------------------\n"
source = 'turkishtestingboard'

url = 'http://www.turkishtestingboard.org/#'
s = requests.session()
r = s.get(url)
data = r.text

data = " ".join(data.split())

# ----- sınavlar -----
print '----- sınavlar -----'

content = []
sinavlar = re.findall('<li><strong>(.*?) / (.*?)</strong><br /> (.*?)</li>', data)

try:
    count = 0
    for sinav in sinavlar:
        count += 1
        date = sinav[0].encode('utf-8')
        location = sinav[1].encode('utf-8')
        header = sinav[2].encode('utf-8')

    content.append({'date': date, 'location': location, 'header': header, 'type': 'exams', 'source': source})
except:
    print "\n\t ** EXCEPTION ** sinav alınamadı \n"

# ----- etkinliker -----
print "\n"
print '----- etkinliker -----'

etkinlikler = re.findall('<span>Etk.nl.kler</span>(.*?) </ul> <div class="clearboth"></div></div>', data)

try:
    etkinlikler = re.findall('<li><a href="(.*?)" target="_blank">(.*?)</a></li>', etkinlikler[0])
    count = 0
    for etkinlik in etkinlikler:
        count += 1
        url = etkinlik[0].encode('utf-8')
        header = etkinlik[1].encode('utf-8')

        if "http://www.turkishtestingboard.org" in url:
            r = s.get(url)
            data_icerik = r.text

            icerik_source = {'date': 'class="mk-moon-calendar-3.*<span style="">(.*?)</span>',
                             'time': 'class="mk-li-clock.*<span style="">(.*?)</span>',
                             'location': 'class="mk-moon-location-6.*<span style="">(.*?)</span>'}

            icerikler = []

            try:
                icerik_date = re.findall('class="mk-moon-calendar-3.*<span style="">(.*?)</span>', data_icerik)
                icerik_date = icerik_date[0].encode('utf-8')
                # print "\tdate => " + icerik_date

                icerik_time = re.findall('class="mk-li-clock.*<span style="">(.*?)</span>', data_icerik)
                icerik_time = icerik_time[0].encode('utf-8')
                # print "\ttime => " + icerik_time

                icerik_location = re.findall('class="mk-moon-location-6.*<span style="">(.*?)</span>', data_icerik)
                icerik_location = icerik_location[0].encode('utf-8')
                # print "\tlocation => " + icerik_location

                icerikler = {'date': icerik_date, 'time': icerik_time, 'location': icerik_location}
                content.append({'url': url, 'header': header, 'icerik': icerikler, 'type': 'event', 'source': source})

            except:
                print "\n\t ** EXCEPTION ** icerik alınamadı\n"

        else:
            content.append({'url': url, 'header': header, 'type': 'event', 'source': source})
except:
    print "\t ** EXCEPTION ** etkinlikler alınamadı"

print "\n"
# ---------------------------------------------------------------------------------------------------------------------

print "\nkeytorc"
print "---------------------\n"
source = 'keytorc'

url = 'http://www.keytorc.com/'
s = requests.session()
r = s.get(url)
data = r.text

data = " ".join(data.split())
data = data.encode('utf-8')

f = open('req_data.txt', 'w')
f.write(data)  # python will convert \n to os.linesep
f.close()

pattern = 'GELECEK <strong>EĞİTİMLER</strong></h1>(.*?)</a> </div> </div> </div>'
egitimler = re.findall(pattern, data)
egitimler = egitimler[0].strip()

try:
    pattern = '<em>Eğitim Yeri: (.*?)</em></h3> <h2 style="color: #a8a7a7; font-size: 18px;">(.*?)</h2> </div></div></div><a class="wpb_button_a" title="Eğitim Detayı" href="(.*?)"'

    egitimler1 = re.findall(pattern, egitimler)

    count = 0
    for egitim in egitimler1:
        count += 1
        try:
            url = egitim[2]
            header = egitim[1]
            location = egitim[0]
            content.append({'location': location,
                            'header': header, 'url': url, 'type': 'seminar', 'source': source})
        except:
            print "\n\t ** EXCEPTION ** icerik alınamadı \n"
except:
    print "\t ** EXCEPTION ** etkinlikler alınamadı"

print "\n"

for conten in content:

    key = ""
    value = ""

    for conte in conten:
        if isinstance(conten[conte], dict):
            for cont in conten[conte]:
                key += cont + ", "
                value += "'" + conten[conte][cont].replace('&#8211;', '&') + "', "

                if cont == 'location':
                    location = conten[conte][cont]
        else:
            key += conte + ", "
            value += "'" + conten[conte] + "', "

            if conte == 'header':
                header = conten[conte]
            if conte == 'source':
                source = conten[conte]

    sql = "SELECT id from events WHERE header = '"+header+"' AND source = '"+source+"';"
    cursor.execute(sql)
    results = cursor.fetchall()

    if results:
        print "'" + source + "' kaynağındaki '" + header +"' başlıklı etkinlik" \
                                                          "\n --- KAYIT EDİLMİŞ ---"
    else:
        sql = "INSERT INTO events (" + key[:-2] + ", insert_date) VALUES (" + value[:-2] + ", '" +current_date+ "');"
        try:
            if cursor.execute(sql):
                print "'" + source + "' kaynağındaki '" + header +"' başlıklı etkinlik" \
                                                          "\n --- KAYIT EDİLDİ ---"
        except:
            print "\t ** EXCEPTION ** sorguda hata oluştu"
            print sql


    print "---------------- \n"

db.commit()
db.close()