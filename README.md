# Clockswork
A website for publishing applications and games. Implemented using the DBMS concepts.

## Cloning Instructions:
**IMPORTANT NOTE:**
Make sure to clone this repo in the `C:\xampp\htdocs` directory since it uses XAMPP to run.

This repo was one of our first trials with using proper source control and so we caused some errors. So, please clone the repo using the following commands instead of the usual one:
```bash
git clone --depth 1 https://github.com/Iten-No-404/Clockswork.git
cd Clockswork/
git fetch --unshallow
```
This fetches and clones only the main branch and doesn't track other remote branches. 
If you want to track and modify the other branches besides the main, you should the commands below:
```bash
git config http.version HTTP/1.1
git config remote.origin.fetch "+refs/heads/*:refs/remotes/origin/*"
git fetch origin
```

## Running Instructions:
1. Make sure that you have XAMPP downloaded, open it and turn on both _Apache_ and _MySQL_.
2. Open [phpmyadmin](http://127.0.0.1/phpmyadmin/index.php?route=/server/sql) to create the database for the first time. Copy and paste the SQL script you find in the [clockwork.sql](./clockwork.sql) file and execute it using the SQL query runner.
3. (Optional) You can also import data so that the website is not empty. The SQL script for the data can be found in [data.sql](./data.sql)
4. Access the website at the following link: [http://localhost/Clockswork/DBProject/HTML/Home.php](http://localhost/Clockswork/DBProject/HTML/Home.php).