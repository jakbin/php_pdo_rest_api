<?php

class validateJson
{
	private $error_message = '';

	private function validateKey($data)
	{
		if (!empty($data)) {

			if (!array_key_exists('first_name', $data) AND !array_key_exists('last_name', $data)) {
				$this->error_message = 'no valid key provided';
				return false;

			}elseif (!array_key_exists('first_name', $data) OR !array_key_exists('last_name', $data)) {
				
				if (!array_key_exists('first_name', $data)){
					$this->error_message = 'first_name key not provided';
					return false;
				}elseif (!array_key_exists('last_name', $data)){
					$this->error_message = 'last_name fkey not provided';
					return false;
				}
			}elseif (array_key_exists('first_name', $data) AND array_key_exists('last_name', $data)){
				return true;	
			}	
		}else{
			$this->error_message = 'no data provided';
			return false;
		}
	}

	function validateData($data)
	{
		if ($this->validateKey($data)) {

			if (!isset($data['first_name']) AND !isset($data['last_name'])) {
				$this->error_message = 'no valide data provided';
				return false;

			}elseif (!isset($data['first_name']) OR !isset($data['last_name'])) {
				
				if (!isset($data['first_name'])){
					$this->error_message = 'first_name not provided';
					return false;
				}elseif (!isset($data['last_name'])){
					$this->error_message = 'last_name not provided';
					return false;
				}
			}elseif (isset($data['first_name']) AND isset($data['last_name'])){
				return true;
			}
		}
	}

	function getErrorMessage()
	{
		return $this->error_message;
	}
}

$testData = new validateJson();