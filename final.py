# _*_ coding: utf-8 _*_

from selenium import webdriver
from bs4 import BeautifulSoup

driver = webdriver.PhantomJS('phantomjs.exe')

def DownloadPageHtml(url):
	print 'Downloading : ' + url
	driver.get(url)
	html = driver.page_source
	return html


from bs4 import BeautifulSoup

html = DownloadPageHtml('http://www.liveonlineradio.net/')
soup = BeautifulSoup(html,'lxml')

countrydiv = soup.find('div',class_ = 'art-BlockContent-body')
allcountry = countrydiv.find_all('li')

for country in allcountry:
	country_name = country.find('a').text.replace("'","")
	
	f = open(country_name + '.sql','w')

	country_url = country.find('a')['href']

	html = DownloadPageHtml(country_url)
	soup = BeautifulSoup(html,'lxml')

	all_station = soup.find('div',class_ = 'widget_categories2a').find_all('a')
	for station in all_station:
		station_url = station['href']
		station_name = station.text.replace("'","")

		html = DownloadPageHtml(station_url)
		soup = BeautifulSoup(html,'lxml')

		station_info = soup.find('div',class_ = 'box22')
		if station_info.find('img'):
			station_image = station_info.find('img')['src'].replace("'","")
		else:
			station_image = ''

		if station_info.find('source'):
			station_url = station_info.find('source')['src'].replace("'","")
		else:
			station_url = ''

		sql = "INSERT INTO radio (countryname, station, img, url) VALUES ('{}','{}','{}','{}');\n".format(country_name,station_name,station_image,station_url)
		print sql
		f.write(sql)
	f.close()


print "Finish."
driver.close()