# -*- coding: utf-8 -*-
"""
Created on Fri Jul 10 00:51:14 2020

@author: Ali
"""

from instabot import Bot 
import json
import requests
import time
bot = Bot() 

s=requests.get("http://localhost/chat_bot/Table/time.php")

post=s.json()


for row in post:
    idd=row['id']
    passw=row['password']
    image=row['pic']
    desc=row['desc']
    tag=row['tag']
    ss=image[30:]
    
    
#c="C://xamp//htdocs//chat_bot//Table//"+ss
#print(c)    
 
    
caption=desc+" #"+tag




bot.login(username = idd,password = passw) 

time.sleep(5)    
#c="C:\\xamp\\htdocs\\chat_bot\\Table\\images\\postsimages\\LoginBG.png"
#c="6.png"    
#bot.upload_photo(c, caption=caption ) 

c="C:\\xamp\\htdocs\\chat_bot\\Table\\images\\postsimages\\6.png"



bot.upload_photo(c, caption="Here It is #software") 