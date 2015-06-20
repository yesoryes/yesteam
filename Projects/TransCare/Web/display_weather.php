<?php
include 'google_weather.php';

class Display_Weather extends Google_Weather{

	private $temp = false;
	
	/**
	 * Constructor for displaying the weather
	 */	
	public function __construct($location, $temp){
		try {
				echo "display weather php";
			switch($temp){
				case "c":
				case "f":
					parent::__construct($location);
				 	$this->temp_ = $temp;
				break;
					
				default:
					throw new Exception("Temperature must be in either C or F.");
				break;
			}
		
		} catch (Exception $e)
		{
		    echo $e->getMessage(), "\n";
		}
	}

/**
	 * Display the current weather
	 */
	public function displayCurrentWeather(){
		if($this->current_ != FALSE){
			echo '<h2>Today In '. $this->getLocation().'The Weather Is:</h2>';
			echo '< img src="http://www.google.com/'.$this->current_[0]->icon['data'].'" alt="'.$this->getLocation().' Weather" />';
			echo '<h4>'. $this->current_[0]->condition['data'].'</h4>';
			echo '<p>The weather in <strong>'. $this->getLocation().'</strong> is currently <strong>'. $this->current_[0]->condition['data'].'</strong> with a temp of <strong>'. $this->current_[0]->temp_c['data'].'&deg;c ('. $this->current_[0]->temp_f['data'].'&deg;f)</strong></p>
			<p>The wind condition is currently <strong>'. $this->current_[0]->wind_condition['data'].'</strong></p>'; 
		} else {
			echo '<h2>Location not found</h2>';
		}
	}
	
	/**
	 * Display the future weather
	 */
	public function displayFutureWeather(){
		if($this->future_ != FALSE){
			foreach($this->future_ as $weather){
				echo '<div class="future_weather">';
					echo '<h2>'. $weather->day_of_week['data'].'</h2>';
					echo '< img src="http://www.google.com/'. $weather[0]->icon['data'].'" alt="'. $this->getLocation().' Weather" />';
					echo '<p>'. $weather->condition['data'].'</p>';
					echo '<p><strong>Low</strong> '. $this->getTemp($weather->low['data']).'<br/>
						<strong>High</strong> '. $this->getTemp($weather->high['data']).'</p>';
				echo '</div>';
			}
		}
	}
	
	/**
	 * Get the temperate and converts to either C or F
	 */
	private function getTemp($temperature){
		if($this->temp_ == "c"){
			return round(($temperature - 32) /1.8) . "&deg;c";
		} 
		
		return $temperature."&deg;f";
	}
}
	?>
