import mysql.connector

mydb = mysql.connector.connect(
	host="192.168.1.10:8889",
	user="root",
	passwd="root"
)

print(mydb)