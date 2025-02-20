const express = require('express');
const mysql = require('mysql2');
const app = express();
const port = 3000;

const connection = mysql.createConnection({
    host: 'mysql',
    user: 'user',
    password: 'password',
    database: 'employees_db'
});

app.get('/employees', (req, res) => {
    connection.query('SELECT * FROM employees', (err, results) => {
        if (err) throw err;
        res.json(results);
    });
});

app.listen(port, () => {
    console.log(`Admin panel running on port ${port}`);
});

