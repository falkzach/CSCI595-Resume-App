# Author: André Gillan
# Tests various elements of the resuME builder website, but doesn't yet verify if they work
# (other than selenium crashing if an expected element is not there)

from selenium import webdriver
from selenium.common.exceptions import TimeoutException
from selenium.webdriver.support.ui import WebDriverWait # available since 2.4.0
from selenium.webdriver.support import expected_conditions as EC # available since 2.26.0
import time
import random as r
import string as s

# returns a list of valid toop-level domain names
def tlds_func():
	f = open('tlds-alpha-by-domain.txt')
	tlds = f.readlines()
	tlds = [x.strip().lower() for x in tlds if x.strip().isalpha()]
	return tlds

# returns a dictionary with appropriate random values for all the inputs used in the test
def random_values_func():
	random_values = {}
	random_values['name'] = r.choice(s.ascii_uppercase) + ''.join([r.choice(s.ascii_lowercase) for x in range(r.randrange(2,8))]) + ' ' + r.choice(s.ascii_uppercase) + ''.join([r.choice(s.ascii_lowercase) for x in range(r.randrange(2,8))])
	random_values['email'] = ''.join([r.choice(s.ascii_lowercase + s.ascii_uppercase + s.digits) for x in range(r.randrange(2,8))]) + '@' + ''.join([r.choice(s.ascii_lowercase + s.digits) for x in range(r.randrange(2,8))]) + '.' + r.choice(tlds_func())
	random_values['password'] = ''.join([r.choice(s.ascii_lowercase + s.ascii_uppercase + s.digits) for x in range(r.randrange(6,14))])
	random_values['telephone'] = ''.join([r.choice(s.digits) for x in range(10)])
	random_values['address'] = ''.join([r.choice(s.ascii_lowercase + s.ascii_uppercase + s.digits + '.,   '*6) for x in range(r.randrange(20,40))])
	random_values['name2'] = r.choice(s.ascii_uppercase) + ''.join([r.choice(s.ascii_lowercase) for x in range(r.randrange(2,8))]) + ' ' + r.choice(s.ascii_uppercase) + ''.join([r.choice(s.ascii_lowercase) for x in range(r.randrange(2,8))])
	random_values['email2'] = ''.join([r.choice(s.ascii_lowercase + s.ascii_uppercase + s.digits) for x in range(r.randrange(2,8))]) + '@' + ''.join([r.choice(s.ascii_lowercase + s.digits) for x in range(r.randrange(2,8))]) + '.' + r.choice(tlds_func())
	random_values['example_input'] = ''.join([r.choice(s.printable) for x in range(r.randrange(20,40))])
	return random_values


def test(values,driver):


	# registering
	register = driver.find_element_by_link_text('Register')
	register.click()

	name_input = driver.find_element_by_id('name')
	name_input.send_keys(values['name'])

	email_input = driver.find_element_by_id('email')
	email_input.send_keys(values['email'])

	password_input = driver.find_element_by_id('password')
	password_input.send_keys(values['password'])

	password_confirm_input = driver.find_element_by_id('password-confirm')
	password_confirm_input.send_keys(values['password'])

	register_button = driver.find_element_by_tag_name('button')
	register_button.click()

	# your resumes
	your_resumes = driver.find_element_by_link_text('Your Résumés')
	your_resumes.click()

	resume1 = driver.find_element_by_xpath('/html/body/div[2]/div/div[2]/div/a/div/div/div')
	resume1.click()

	your_resumes = driver.find_element_by_link_text('Your Résumés')
	your_resumes.click()

	resume2 = driver.find_element_by_xpath('/html/body/div[2]/div/div[3]/div/a/div/div/div')
	resume2.click()

	# build
	build = driver.find_element_by_link_text('Build')
	build.click()

	education = driver.find_element_by_xpath('/html/body/div[2]/div/div[2]/div/a[1]/div')
	education.click()

	input = driver.find_element_by_id('formGroupExampleInput')
	input.send_keys(values['example_input'])

	driver.back()

	# account
	account = driver.find_element_by_link_text('Account')
	account.click()

	edit = driver.find_element_by_xpath('/html/body/div[2]/div/div[2]/div[1]/button[1]')
	edit.click()

	name_input = driver.find_element_by_id('name_input')
	email_input = driver.find_element_by_id('email_input')
	telephone_input = driver.find_element_by_id('telephone_input')
	address_input = driver.find_element_by_id('address_input')

	time.sleep(2) # wait for php backend, otherwise the send_keys input is overwritten once the backend returns values

	name_input.clear()
	name_input.send_keys(values['name2'])

	email_input.clear()
	email_input.send_keys(values['email2'])

	telephone_input.clear()
	telephone_input.send_keys(values['telephone'])

	address_input.clear()
	address_input.send_keys(values['address'])

	time.sleep(2) # sometimes the submit button takes a while to show up

	submit = driver.find_element_by_xpath('/html/body/div[2]/div/div[2]/div[2]/form/button')

	submit.click()

	# logout
	logout = driver.find_element_by_link_text('Logout')
	logout.click()



def main():
	driver = webdriver.Chrome()

	driver.get('http://localhost:8000')

	for i in range(10):
		test(random_values_func(),driver)

	driver.close()

main()
