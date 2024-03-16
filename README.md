# Website-v1
Known Vulnerability: SQLi

## Description
This project forms part of our capstone endeavor for the Specialist Diploma in Cybersecurity Practice. For more comprehensive details about the overarching project, kindly refer to this [link](https://github.com/4GuysCoffee/4GuysCoffee.github.io).

This repository entails the development of a web application featuring a login system that interfaces with our backend database, powered by MariaDB. Regrettably (but intentionally), the system has exhibited vulnerability to a well-known SQL injection attack due to inadequately sanitised code. Notably, the presence of a file named 'user-input.log' facilitates the logging of user inputs. Despite the susceptibility to SQLi, this log file enables developers to monitor and analyse user inputs inclusive of potential SQL injection commands.

## Installation Steps
1. Set up a server according to your preferences. The subsequent instructions assume [XAMPP](https://www.apachefriends.org/download.html) as the chosen server.

Tip: if you have brew enabled, run the following commands to install XAMPP:

```sh
$ brew install --cask xampp
```

2. Download the contents of the htdocs folder and relocate them to the XAMPP htdocs directory, typically found at Applications/XAMPP/xamppfiles/htdocs.
3. From the XAMPP Manager app, activate both Apache and MySQL servers.
4. The web application is now accessible via 'localhost'.
5. Configure the database by navigating to the following URL: localhost/phpmyadmin.
6. Establish a database named 'test' and subsequently create a table named 'user' within it.
7. Within the 'user' table, define columns in the prescribed order: 'id', 'username', 'email', 'saved_password'.
8. Configuration is now complete. Proceed to test the SQLi attack on the retrieve username page.
9. User inputs on this specific page will be captured and logged in the user-input.log file.