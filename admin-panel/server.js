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
        res.json(results);
    });
});

app.listen(3000, () => console.log("Admin Panel running on port 3000"));

