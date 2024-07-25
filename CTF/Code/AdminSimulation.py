import requests
import time

def simulate_admin_login():
    # Base URL
    base_url = 'http://localhost/MyPrjcts/GotTheEvidence/CTF/Code/login/'

    # Headers
    headers = {
        'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:127.0) Gecko/20100101 Firefox/127.0',
        'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
        'Accept-Language': 'en-US,en;q=0.5',
        'Accept-Encoding': 'gzip, deflate, br',
        'Content-Type': 'application/x-www-form-urlencoded',
        'Origin': 'http://localhost',
        'Connection': 'keep-alive',
        'Upgrade-Insecure-Requests': '1',
        'Sec-Fetch-Dest': 'document',
        'Sec-Fetch-Mode': 'navigate',
        'Sec-Fetch-Site': 'same-origin',
        'Sec-Fetch-User': '?1',
        'Priority': 'u=1',
    }

    # Initial login request
    login_data = {
        'mail': 'davidgrey@umbrella.com',
        'password': 'umb',
        'SignIn': 'Login Now'
    }

    # Session to handle cookies
    session = requests.Session()
    response = session.post(base_url + 'index.php', headers=headers, data=login_data)
    print('Initial login response:', response.status_code)

    # Second authentication request
    auth_data = {
        'key': 'Lavade',
        'SignIn': 'Login Now'
    }
    
    response = session.post(base_url + 'LoginCheck.php', headers=headers, data=auth_data)
    print('Second authentication response:', response.status_code)

    # Request to access the blog post page
    blog_url = 'http://localhost/MyPrjcts/GotTheEvidence/CTF/Code/blog/post.php'
    response = session.get(blog_url, headers=headers)
    print('Blog post page response:', response.status_code)

    if response.status_code == 200:
        # Check if cookies are being sent
        print('Cookies:', session.cookies.get_dict())

if __name__ == "__main__":
    while True:
        simulate_admin_login()
        time.sleep(5)
        print('\n')
