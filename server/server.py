#!/usr/bin/python
import json
from address_reader import process_query
from sys import version as python_version
from cgi import parse_header, parse_multipart
from urllib.parse import parse_qs
from http.server import BaseHTTPRequestHandler, HTTPServer
PORT_NUMBER = 5216

#This class will handles any incoming request from
#the browser 
class myHandler(BaseHTTPRequestHandler):


  def parse_POST(self):
    ctype, pdict = parse_header(self.headers['content-type'])
    if ctype == 'multipart/form-data':
      postvars = parse_multipart(self.rfile, pdict)
    elif ctype == 'application/x-www-form-urlencoded':
      length = int(self.headers['content-length'])
      postvars = parse_qs(
              self.rfile.read(length), 
              keep_blank_values=1)
    else:
      postvars = {}
    return postvars

  def do_POST(self):
    content_length = int(self.headers['Content-Length'])
    postvars = self.rfile.read(content_length)
    postvars = json.loads(postvars.decode('utf-8'))
    self.send_response(200)
    self.send_header('Content-type','text/html')
    self.end_headers()
    print(postvars)
    k_points = process_query(postvars['k_num'], postvars['poi'])
    # Send the html message
    self.wfile.write(json.dumps(k_points).encode('utf-8'))

  #Handler for the GET requests
  def do_GET(self):
    self.send_response(200)
    self.send_header('Content-type','text/html')
    self.end_headers()
    # Send the html message
    json_string = json.dumps({'hi': 3})
    self.wfile.write(bytes(json_string, 'utf-8'))
    return

try:
  #Create a web server and define the handler to manage the
  print (f'service running on port {PORT_NUMBER}')
  
  #Wait forever for incoming htto requests
  server = HTTPServer(('', PORT_NUMBER), myHandler)
  server.serve_forever()
except KeyboardInterrupt:
  print ('^C received, shutting down the web server')
  server.socket.close()
