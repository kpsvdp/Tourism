<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link rel="stylesheet" href="../assets/style/style.css">
</head>
<body>
 <header>
    <h1>France Tourism</h1>
</header>    
<nav>
    <ul class="menu-list">
        <li> <a href="../index.php"> Home</a></li>
        <li> <a href="places.php">Places</a></li>
        <li> <a href="booking_list.php">Bookings List</a></li>
        <li> <a href="reports.php">Reports</a></li>
        <li> <a href="credits.html">Credits</a></li>
    </ul>
</nav>
<div class="report_format">
    <h1 align="center">Security report</h1>
    <h2>Introduction</h2>
    <p>The steps required to protect a website from online attackers are known as website security or cyber security. As a service provider, maintaining the privacy of users' and consumers' personal information is crucial because a client data breach may lead to litigation, hefty fines, and tarnished reputations.</p>
    <p> These serious security risks are the most typical ways that a website or web application is compromised. Top web-based service vulnerabilities include the following: 1. SQL injection 2. Cross-site scripting  3. Poor authentication 4. Unsafe Direct Object References 5. Insecure Cryptographic Storage.</p>
    <h2>SQL injection</h2>
    <p>It is one of the most dangerous risks to the website, although according to Mohamed and Yousef (2014), it barely appeared 8% of the time since web developers were aware of online security. In order to gain access to the database without having proper permission, hackers in this case provided a piece of unreliable information through input fields or URLs (Bhatt, 2018). This issue can be avoided by restricting user access and validating, sanitising user inputs prior to processing them. Every input field in our web solution has been verified and cleaned up to avoid this vulnerability.</p>
    <h2>Cross-site scripting</h2>
    <p>Cross-site scripting (commonly known as XSS), which is used to execute malicious code in the browser, is used to hijack the session tokens and/or cookies stored in the browser, as indicated by Batt (2018) and Mohamed and Yousef (2014). It occurs because the web solution lacks an input validity property. Filtering meta characters—special characters used to create scripts—and whitelisting input fields may help prevent XSS. All of the input forms on our website have been cleaned and validated.</p>
    <h2>Poor authentication</h2>
    <p>According to Bhatt (2018), incorrect implementation of authentication and session functionalities enables attackers to compromise passwords, keys, or session tokens or to temporarily or permanently exploit other user identities. In order to disguise user credentials in URLs, this web application developed authentication and sessions and used the post method.</p>
    <h2>Unsafe Direct Object References</h2>
    <p>When internal implementation objects like file directories, database keys, and form parameters are made available to users, malicious intruders can utilise them to their advantage (Osman, Dafa-Allah and Mohammed Elhag, 2017). By altering the object reference value, an attacker can access the system and modify or destroy data. Developers should utilise the POST method to hide the data in URLs in order to avoid this issue. POST method is used during website construction to keep all relevant information from users.</p>
    <h2>Insecure Cryptographic Storage</h2>
    <p>Osman, Dafa-Allah, and Mohammed Elhag (2017) claim that encrypting credit card information is necessary in order to prevent the misuse of sensitive data like passwords and banking details if an attacker gets access to the database. Some programmers neglected to store data in encrypted form. The user passwords are secure because we used password hash hashing to encrypt them before adding them into the database.</p>
    <h2>Conclusion: </h2>
    <p>Thus, it may be inferred that, as already noted, online security issues have an influence on the privacy of user information. Limiting user access, validating and sanitising input fields, and avoiding the exposure of sensitive information in URLs are fundamental requirements to avoid all these vulnerabilities. Some preventive measures are required to further secure websites and user accounts, such as keeping software up to date, using strong passwords, maintaining the confidentiality and integrity of user data, and restricting bot attacks.</p>
    <p>It is advised to block a user account after a certain number of failed login attempts for a day in order to prevent bot attacks, as some preventive mechanisms are currently only partially implemented.</p>
</div>
<div class="credits_list">
    <h2 align="center">Referencess</h2>
    <p>1. Bhatt, D., 2018. Cyber Security Risks For Modern Web Applications: Case Study Paper For Developers And Security Testers. INTERNATIONAL JOURNAL OF SCIENTIFIC & TECHNOLOGY RESEARCH, [online] 7(5), pp.232-235. Available at: https://www.ijstr.org/final-print/may2018/Cyber-Security-Risks-For-Modern-Web-Applications-Case-Study-Paper-For-Developers-And-Security-Testers.pdf [Accessed 6 January 2023].</p>
    <p>2. Mohamed, A. and Yousef, S., 2014. The Reality of Applying Security in Web Applications in Academia. International Journal of Advanced Computer Science and Applications,, 5(10), pp.7-15.</p>
    <p>3. Osman, A., Dafa-Allah, A. and Mohammed Elhag, A., 2017. Proposed security model for web based applications and services. 2017 International Conference on Communication, Control, Computing and Electronics Engineering (ICCCCEE), [online] pp.1-6. Available at: https://ieeexplore.ieee.org/document/7866696 [Accessed 6 January 2023].</p>
</div>
<br><br><br>
<footer>
    <p>&#169;france Tourism</p>
</footer>
</body>
</html>