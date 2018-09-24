**Expense Tracker**

* Installation 
    * For just copy these files into your apache base folder (www / htdocs)
    * You can use of any version of PHP above 5.x
    * (Optional) Now your can create a virtual host e.g. loc.expensestracker.com
    * (Optional) Also register local domain to you /etc/hosts (for windows C:\Windows\System32\drivers\etc\hosts)
  
* Database
    * Now create an empty database in MySQL with any name (e.g. expenses)
    * After than update your database config to application/config/database.php
    * For Migration hit http://loc.expensestracker.com/migrate or http://localhost/expenses-tracker/index.php/migrate

* Users
    * Go to http://loc.expensestracker.com/ or http://localhost/expenses-tracker/
    * Click on Register
    * Fill the details and hit the register button
    * Come back to Login Screen and try login with newly created user/password
    * PS: you can also user email/password
        
* Transactions
    * View All http://loc.expensestracker.com/transaction
    * Add New http://loc.expensestracker.com/transaction/create
    * You Edit and Delete and Transaction from View All page only
    * Search Box is available on View All page only
    * View All page is also supports Pagination 
    
* DashBoard
    * http://loc.expensestracker.com/dashboard
    
    
     