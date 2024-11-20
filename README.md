# PushMarket: software

<p align="center">
<a href=""><img src="/public/logo.png" alt="Logo" width="150px"></a>
</p>

<p align="center">
<b>Simple business management software.</b>
</p>


<p>
A very simple software for business, taking into account all the conditions of supermarkets, having a settings section for better use, creating different cashiers for stores that have several cashiers.
</p>

## What technologies are used?
PHP 8.2
Larvel v11
Mysql
Javascript
Vuejs 3
Bootstrap 5
Css 
HTML

## Installation guide:
```bash
# Step 1: Install the app itself using git:
git clone https://github.com/sina1010anis/PushMarket.git

# Step 2: Install the program prerequisites:
composer install
npm install

# Step 3: After installing the prerequisites:
cp .env.example .env
php artisan key:generate
php artisan storage:link
php artisan migrate --seed
# Step 4: If you don't have the desired database, please import the pushmarket.sql file.
```

## Introduction of cashier:
This software is intended for grocery stores, but it can be used for other jobs that have barcode capability. This department includes four departments: product sales, product management, invoice reporting, and accounts payable. The cash register and product sales department can read product barcodes using a barcode reader and use them to create and present a more accurate invoice.

## Introduction to accounting:
In this section, it is very simple to pay attention to accounting and it is only for the management of various inventories and does not have any special features.

## Introduction of warehousing:
In this department, like the accounting department, it is very simple and does not have special facilities, the most facilities are in the cashier department.

## Introduction of setting:
In the settings section, attention has been paid to most of the sections, which are: 1-Cashiering 2-Warehousing 3-Accounting 4-Management 5-Lock 6-About
Part 1 Cashiering: We provide facilities such as changing the currency, changing the cashier window, deleting data and hiding menus.
Part 2 Storage: It doesn't just hide the menu
Part 3 Accounting: delete data, create a bank account for further management and select them for the default account
Part 4 Management: In this section, you can add more cashiers and work separately by activating the option.
Part 5 Lock: In this section, you can lock the desired menus and not allow access to anyone.

## Images of the software environment:
<p align="center"><a href=""><img src="/public/Screenshots/1.png" alt="" width="550px" style="max-width:100%"></a></p><br>
<p align="center"><a href=""><img src="/public/Screenshots/2.png" alt="" width="550px" style="max-width:100%"></a></p><br>
<p align="center"><a href=""><img src="/public/Screenshots/3.png" alt="" width="550px" style="max-width:100%"></a></p><br>
<p align="center"><a href=""><img src="/public/Screenshots/4.png" alt="" width="550px" style="max-width:100%"></a></p><br>
<p align="center"><a href=""><img src="/public/Screenshots/5.png" alt="" width="550px" style="max-width:100%"></a></p><br>
<p align="center"><a href=""><img src="/public/Screenshots/6.png" alt="" width="550px" style="max-width:100%"></a></p><br>
<p align="center"><a href=""><img src="/public/Screenshots/7.png" alt="" width="550px" style="max-width:100%"></a></p><br>
<p align="center"><a href=""><img src="/public/Screenshots/8.png" alt="" width="550px" style="max-width:100%"></a></p><br>
<p align="center"><a href=""><img src="/public/Screenshots/9.png" alt="" width="550px" style="max-width:100%"></a></p><br>
<p align="center"><a href=""><img src="/public/Screenshots/10.png" alt="" width="550px" style="max-width:100%"></a></p><br>
<p align="center"><a href=""><img src="/public/Screenshots/11.png" alt="" width="550px" style="max-width:100%"></a></p><br>
<p align="center"><a href=""><img src="/public/Screenshots/12.png" alt="" width="550px" style="max-width:100%"></a></p><br>
<p align="center"><a href=""><img src="/public/Screenshots/13.png" alt="" width="550px" style="max-width:100%"></a></p><br>
<p align="center"><a href=""><img src="/public/Screenshots/14.png" alt="" width="550px" style="max-width:100%"></a></p><br>
<p align="center"><a href=""><img src="/public/Screenshots/15.png" alt="" width="550px" style="max-width:100%"></a></p><br>
<p align="center"><a href=""><img src="/public/Screenshots/16.png" alt="" width="550px" style="max-width:100%"></a></p><br>

## Last changes:
1-fix
2-Change the display of windows
3-Solving appearance problems

