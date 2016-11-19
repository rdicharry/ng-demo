<?php

/**
 * Class Weather
 *
 * encapsulate weather (forecast) data and its associated timestamp.
 *
 * currently does not interact with the database (no insert(), update(), delete()
 * methods implemented.
 *
 * @author Rebecca Dicharry <rdicharry@cnm.edu>
 */
class Weather implements JsonSerializable {

	private $temperatureMax;

	private $temperatureMin;

	private $windSpeed;

	private $timestamp;

	/**
	 * Weather constructor.
	 * @param $temperatureMax float the temperature in fahrenheit
	 * @param $temperatureMin float the temeprature in fahrenheit
	 * @param $windSpeed float the wind speed in miles per hour
	 * @param $timestamp int the time associated with this forecast.
	 * @throws Exception
	 */
	public function __construct($temperatureMax, $temperatureMin, $windSpeed,int $timestamp){
		try{
			$this->setTemperatureMax($temperatureMax);
			$this->setTemperatureMin($temperatureMin);
			$this->setWindSpeed($windSpeed);
			$this->setTimestamp($timestamp);
		} catch(\InvalidArgumentException $iae){
			throw(new \InvalidArgumentException($iae->getMessage(), 0, $iae));
		} catch(\RangeException $re){
			throw(new \RangeException($re->getMessage(), 0, $re));
		} catch(\Exception $e){
			throw(new \Exception($e->getMessage(), 0, $e));
		}

	}

	public function getTemperatureMax(){
		return $this->temperatureMax;
	}

	public function setTemperatureMax($newTemp){
		$newTemp = filter_var($newTemp, FILTER_VALIDATE_FLOAT);
		if($newTemp === false){
			throw(new \InvalidArgumentException("temperature must be a floating point number"));
		}

		$this->temperatureMax = floatval($newTemp);
	}


	public function getTemperatureMin(){
		return $this->temperatureMin;
	}

	public function setTemperatureMin($newTemp){
		$newTemp = filter_var($newTemp, FILTER_VALIDATE_FLOAT);
		if($newTemp === false){
			throw(new \InvalidArgumentException("temperature must be a floating point number"));
		}

		$this->temperatureMin = floatval($newTemp);
	}

	public function getWindSpeed(){
		return $this->windSpeed;
	}

	public function setWindSpeed($newWindSpeed){
		$newWindSpeed = filter_var($newWindSpeed, FILTER_VALIDATE_FLOAT);
		if($newWindSpeed === false){
			throw(new \InvalidArgumentException("wind speed must be a floating point number"));
		}

		$this->windSpeed = floatval($newWindSpeed);
	}

	public function getTimestamp(){
		return $this->timestamp;
	}

	public function setTimestamp(int $time){
		$time = filter_var($time, FILTER_VALIDATE_INT);

		if($time === false ){
			if($time <0) {
				throw(new \InvalidArgumentException("time stamp must be a positive integer"));
			}
		}

		$this->timestamp = $time;
	}




}