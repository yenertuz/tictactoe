import smtplib

server = smtplib.SMTP("smtp.live.com", 25)
server.starttls()

server.login("yenertuz@hotmail.com", "2910*YnR/4117")

msg = "Subject: test"
msg += "\n\n"
msg += "Hello!\nYener!"

server.sendmail("yenertuz@hotmail.com", "edwinnauch@mail.com", msg)

server.close()