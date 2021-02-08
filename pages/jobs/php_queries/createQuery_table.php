CREATE TABLE tbl_customer (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(11) NULL,
user_id VARCHAR(55) NULL,
source_dropdown VARCHAR(55) NULL,
cust_title VARCHAR(55) NULL,
cust_fname VARCHAR(55) NULL,
cust_lname VARCHAR(55) NULL,
cust_company VARCHAR(55) NULL,
cust_address1 VARCHAR(55) NULL,
cust_address2 VARCHAR(55) NULL,
cust_town VARCHAR(55) NULL,
cust_country VARCHAR(55) NULL,
cust_postcode VARCHAR(55) NULL,
cust_mobile VARCHAR(55) NULL,
cust_phone VARCHAR(55) NULL,
cust_email VARCHAR(55) NULL
date TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)

CREATE TABLE tbl_jobs (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(11) NULL,
customer_id INT(11) NULL,
job_ref VARCHAR(55) NULL,
checkbox_ref1 VARCHAR(55) NULL,
checkbox_ref2 VARCHAR(55) NULL,
checkbox_ref3 VARCHAR(55) NULL,
my_round VARCHAR(55) NULL,
window_cleaning VARCHAR(55) NULL,
job_hrs VARCHAR(55) NULL,
job_mins VARCHAR(55) NULL,
job_ppl VARCHAR(55) NULL,
jobs_sched_date VARCHAR(55) NULL,
number_d_w_m VARCHAR(55) NULL,
d_w_m_option1 VARCHAR(55) NULL,
d_w_m_option2 VARCHAR(55) NULL,
jobs_price1 DOUBLE NULL,
per_jobs VARCHAR(55) NULL,
jobs_price2 DOUBLE NULL,
jobs_price3 DOUBLE NULL,
checkbox_job_price VARCHAR(55) NULL,
payment_method VARCHAR(55) NULL,
checkbox_jobs_invoice VARCHAR(55) NULL,
job_notes VARCHAR(55) NULL,
checkbox_notes VARCHAR(55) NULL,
new_customer_input VARCHAR(55) NULL,
job_address1 VARCHAR(55) NULL,
job_address2 VARCHAR(55) NULL,
job_town VARCHAR(55) NULL,
job_country VARCHAR(55) NULL,
job_postcode VARCHAR(55) NULL,
date TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)

