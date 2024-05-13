// server.js

const http = require('http');
const mysql = require('mysql');
const url = require('url');
const fs = require('fs');

// Create a connection to MySQL database
const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'registered'
});

// Connect to MySQL
connection.connect((err) => {
  if (err) {
    console.error('Error connecting to MySQL:', err);
    return;
  }
  console.log('Connected to MySQL');
});

// Create an HTTP server
http.createServer((req, res) => {
  // Parse the request URL
  const parsedUrl = url.parse(req.url, true);
  const path = parsedUrl.pathname;

  // Handle POST request to add data
  if (req.method === 'POST' && path === '/addData') {
    let body = '';
    req.on('data', (chunk) => {
      body += chunk.toString();
    });

    req.on('end', () => {
      const data = JSON.parse(body);

      // Insert data into MySQL
      const sql = `INSERT INTO income (date, type,inco) VALUES (?, ?,?)`;
      connection.query(sql, [data.date, data.type,data.inco], (err, result) => {
        if (err) {
          console.error('Error inserting data:', err);
          res.writeHead(500, {'Content-Type': 'text/plain'});
          res.end('Error inserting data');
          return;
        }
        console.log('Data inserted successfully');
        res.writeHead(200, {'Content-Type': 'text/plain'});
        res.end('Data inserted successfully');
      });
    });
  } else {
    // Serve HTML file with form
    fs.readFile('index.html', (err, data) => {
      if (err) {
        res.writeHead(404, {'Content-Type': 'text/html'});
        res.end('404 Not Found');
        return;
      }
      res.writeHead(200, {'Content-Type': 'text/html'});
      res.end(data);
    });
  }
}).listen(3000);

console.log('Server running at http://localhost:3000/');
