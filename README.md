<h1>Real Estate Agency Website</h1>

<h3>Description</h3>

<p>This is a website for real estate agency. It could be used to display multiple
real estate properties, testimonials, real estate agents, contact info, about page etc.</p>

<p>It has support for two languages: English and Croatian.</p>

<p>This website also has a CMS system. So admin can log-in and change the content of the site. Using CMS admin can add/edit/delete properties, agents, testimonials and contact information.</p>

<p>Here is a link to <a href="#">DEMO</a>. Unfortunately, you can't access CMS on live demo because anyone could potentially change something on the website and add something inappropriate. If you want to see CMS you will have to install project locally.</p>

<p>On home page, you can see property images in carousel, services that agency provides, few properties, agents and testimonials. There are separate pages for list of all properties and agents.</p>

<p>You also have an option to filter all properties based on multiple factors like: number of beds, city, price etc. <i>(If you try to filter this results on the demo I recommend to choose maximum of 2 options because if you choose more options you will probably get no results since there are only 10 properties in the database)</i></p>

<p>I used Laravel framework to build this website. I also used HTML, CSS, jQuery, Bootstrap. Laravel translatable package was used to make site support multiple languages.</p>

<h3>How to use this website</h3>

<p>This section has two parts. First part explains how to use the website (this part will be shot because most things are self explanatory) and the second part explains how to use the CMS.</p>

<h4>Website</h4>

<p>In this section I will only mention how to use filter functionality and relation between agents and properties. Other things on the website are obvious and not worth explaining.</p>

<p><b>Filter properties.</b> When you go to see list of all properties by clicking on the property link in navigation bar, you will see 6 properties on each page. Above those images you will see an option to select All, Active or Sold.</p>

![image that shows filter option](https://github.com/LukaBis/ReadmeImages/blob/main/SmallFilterCircle.png?raw=true)

<p>Each property can have one of two statuses: active or sold. If you click Active, only active properties will be shown. In case you click Sold, only sold properties will be shown. Otherwise you will see all properties.</p>

<p>If you click on search icon in navigation bar you will see a search form. It enables you to search properties based on multiple conditions.</p>

![image that shows filter option](https://github.com/LukaBis/ReadmeImages/blob/main/filter.png?raw=true)

<p><b>Connection between agents and properties.</b> Each <b>agent is responsible for multiple of properties</b>(in some cases its 3 properties, sometimes just one, sometimes none).</p>

<p>When you click on agent and you see all data about to that agent, at the bottom of the page you will see all properties that belong to that agent.</p>

![agent's properties](https://github.com/LukaBis/ReadmeImages/blob/main/agents_properties.png?raw=true)

<h4>CMS</h4>
