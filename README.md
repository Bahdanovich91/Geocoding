<h2>Geocoding Project</h2>
<p>This project provides a simple interface for geocoding operations, allowing you to convert coordinates to addresses (reverse geocoding) and addresses to coordinates (forward geocoding).</p>

<h3>Reverse Geocoding</h3>
<p>To perform reverse geocoding and obtain the address for a given set of coordinates, use the form or the following URL:</p>
<pre><code>http://localhost/index.php?request_type=get_address&amp;request_data[latitude]=<em>YOUR_LATITUDE</em>&amp;request_data[longitude]=<em>YOUR_LONGITUDE</em></code></pre>

<h3>Forward Geocoding</h3>
<p>To perform forward geocoding and obtain the coordinates for a given address, use the form or the following URL:</p>
<pre><code>http://localhost/index.php?request_type=get_coordinates&amp;request_data[address]=<em>YOUR_ADDRESS</em></code></pre>