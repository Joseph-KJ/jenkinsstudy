const express = require('express');
const mysql = require('mysql');

const app = express();
const db = mysql.createConnection({
    host: "db",
    user: "root",
    password: "root",
    database: "employee_db"
});

db.connect(err => {
    if (err) throw err;
    console.log("MySQL Connected...");
});

app.get('/employees', (req, res) => {
    db.query("SELECT * FROM employees", (err, results) => {
        if (err) throw err;
        let html = `
            <html>
            <head>
                <title>Employee List</title>
                <style>
                    body { font-family: Arial, sans-serif; text-align: center; background-color: #f4f4f4; }
                    table { width: 80%; margin: 20px auto; border-collapse: collapse; background: white; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
                    th, td { padding: 10px; border: 1px solid #ddd; }
                    th { background: #28a745; color: white; }
                    tr:nth-child(even) { background: #f2f2f2; }
                </style>
            </head>
            <body>
                <h2>Employee List</h2>
                <table>
                    <tr><th>ID</th><th>Name</th><th>Email</th></tr>
        `;
        results.forEach(emp => {
            html += `<tr><td>${emp.id}</td><td>${emp.name}</td><td>${emp.email}</td></tr>`;
        });
        html += `</table></body></html>`;
        res.send(html);
    });
});

app.listen(3000, () => console.log("Admin Panel running on port 3000"));
