<?php
$domain="localhost";
$dbuser="root";
$dbpass="";
$dbname="job";
$x=0;
$total=0;
mysql_connect($domain,$dbuser,$dbpass) or die(mysql_error());
if(mysql_select_db($dbname))
$x=1;
else
$x=2;
if($x==2)
{
	
mysql_query("create database job") or die(mysql_error());
		echo "<br>Your Database is Successfully created";
}else if($x==1)

{ //create employee table
mysql_query("CREATE TABLE employee (eid varchar(255) primary key NOT NULL,fullname varchar(255) NOT NULL,
sex text NOT NULL,phone varchar(255) NOT NULL,email varchar(255) NOT NULL,
workplace varchar(255) NOT NULL, position varchar(255) NOT NULL)") or die(mysql_error());
echo "<br>employee table created";
$total++;
//create account table
mysql_query("CREATE TABLE account(uid varchar(255) primary key NOT NULL,foreign key(uid) references employee(eid),username varchar(255) NOT NULL,
  password varchar(255) NOT NULL,role varchar(255) NOT NULL,status varchar(255) NOT NULL)") or die(mysql_error());
echo "<br>account table created";
$total++;
//create applicantresult table
mysql_query("CREATE TABLE applicantresult (aid varchar(255) primary key NOT NULL,afullname varchar(255) NOT NULL,
  asex varchar(100) NOT NULL,organaization_name varchar(255) NOT NULL,
  vacancy_title varchar(255) NOT NULL,for_girls varchar(15) NOT NULL,
  test varchar(15) NOT NULL,interview varchar(15) NOT NULL,
  total_grade varchar(100) NOT NULL,result varchar(100) NOT NULL,
  selected_by varchar(100) NOT NULL,date date NOT NULL,
  eid_fk varchar(255), foreign key(eid_fk) references employee(eid))") or die(mysql_error());
echo "<br>applicantresult table created";
$total++;
//exam applicant table
mysql_query("CREATE TABLE applicant (aid varchar(255) primary key NOT NULL,afullname varchar(100) NOT NULL,
  asex varchar(100) NOT NULL,aeducational_level varchar(255) NOT NULL,
  aprofetion varchar(100) NOT NULL,agrade varchar(100) NOT NULL,
  aregistration_date date NOT NULL,eid varchar(255), foreign key(eid) references employee(eid))") or die(mysql_error());
echo "<br>applicant table created";
$total++;
//applicantdoc
mysql_query("CREATE TABLE applicantdoc (aid varchar(255) primary key NOT NULL,fullname varchar(100) NOT NULL,
  sex varchar(100) NOT NULL,phone int NOT NULL,cv varchar(100) NOT NULL,
  work_exprience varchar(100) NOT NULL,educational_background varchar(100) NOT NULL,
  jobtitle text NOT NULL,level text NOT NULL,orgname text NOT NULL,
  registration_date date NOT NULL,eid varchar(255), foreign key(eid) references employee(eid))") or die(mysql_error());
echo "<br>applicantdoc table created";
$total++;
//category
mysql_query("CREATE TABLE category (cat_id varchar(255) primary key  NOT NULL,cat_name varchar(100) NOT NULL,
  date date NOT NULL,
  eid varchar(255), foreign key(eid) references employee(eid))") or die(mysql_error());
echo "<br>category table created";
$total++;

//create job_desc table
mysql_query("CREATE TABLE job_desc (job_id varchar(255) primary key  NOT NULL,job_title varchar(100) NOT NULL,
  permissible varchar(255) NOT NULL,orgname text NOT NULL,level_type varchar(100) NOT NULL,
  cat_name varchar(100) NOT NULL,eid varchar(255), foreign key(eid) references employee(eid))") or die(mysql_error());
echo "<br>job_desc table created";
$total++;

//create level table
mysql_query("CREATE TABLE level (level_id  varchar(255) primary key  NOT NULL,level_type varchar(100) NOT NULL,
  date date NOT NULL,eid varchar(255), foreign key(eid) references employee(eid))") or die(mysql_error());
echo "<br>level head table created";
$total++;

//create organization table
mysql_query("CREATE TABLE organization (orgid varchar(255) primary key NOT NULL,orgname varchar(255) NOT NULL,
  orgregdate date NOT NULL,eid varchar(255), foreign key(eid) references employee(eid))") or die(mysql_error());
echo "<br>organization table created";
$total++;
//create postvacany table
mysql_query("CREATE TABLE postvacany (vid varchar(255) NOT NULL,jobid varchar(255) NOT NULL,
  jobtitle varchar(100) NOT NULL,leveltype varchar(255) NOT NULL,
  organaization_name varchar(100) NOT NULL,workprocess varchar(255) NOT NULL,
  workdescription text NOT NULL,posted_date date NOT NULL,registration_date date NOT NULL,
  dead_line date NOT NULL,test_will_beon date NOT NULL,postedby text NOT NULL,
  eid varchar(255), foreign key(eid) references employee(eid),
  aid varchar(255), foreign key(aid) references applicant(aid))") or die(mysql_error());
echo "<br>postvacany table created";
$total++;
//create request table

mysql_query("CREATE TABLE request (rid varchar(255) primary key NOT NULL,
  jobtitle varchar(255) NOT NULL,leveltype varchar(100) NOT NULL,
  organaization_name varchar(255) NOT NULL,work_process varchar(100) NOT NULL,
  description text NOT NULL,requestedno int NOT NULL,work_starting_date date NOT NULL,
  requested_by varchar(100) NOT NULL,budget_availablity_checked_by varchar(100) NOT NULL,
  status varchar(100) NOT NULL,
  job_id varchar(255), foreign key(job_id) references job_desc(job_id),
  eid varchar(255), foreign key(eid) references employee(eid))
  ") or die(mysql_error());
echo "<br> request table created";
$total++;
echo "<br> $total Tables Created!";

}
?>