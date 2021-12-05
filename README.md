<h1>Real Estate Agency Website</h1>
<img src="https://img.shields.io/badge/License-MIT-blue.svg" />

##### Table of Contents  
- [1.Installation](#instalation)  
- [2.Description](#description)
- [3.HowTo](#HowTo)
  * [3.1 website](#website)
  * [3.2 cms](#cms)

<a name="instalation"/>
<h3>Installation</h3>

<p>Please check the official laravel installation guide for server requirements before you start. <a href="https://laravel.com/docs/8.x/installation">Official Documentation</a></p>

<p>Laravel 8 requires PHP 7.3+ or above so you need this version or the latest version of PHP installed on your system.</p>

<p>Clone the repository</p>

```
git clone https://github.com/LukaBis/real-estate-site.git
```
<p>Switch to the repo folder</p>

```
cd real-estate-site
```

<p>Install all the dependencies using composer</p>

```
composer install
```

<p>Copy the example env file and make the required configuration changes in the .env file</p>

<p>Linux</p>

```
cp .env.example .env
```
<p>Windows</p>

```
copy .env.example .env
```

<p>Generate a new application key</p>

```
php artisan key:generate
```

<p>Run the database migrations <b>(Set the database connection in .env before migrating)</b></p>

```
php artisan migrate
```

<p>Run the database seeder</p>

```
php artisan db:seed
```

<p>Create the symbolic link</p>

```
php artisan storage:link
```

<p>Check images folder that is inside inside public. Delete images folder if there are no images (image files) in sub-folders of images folder. Then create new, empty images folder. and run:</p>

```
php artisan storage:link
```

<p>Start the local development server</p>

```
php artisan serve
```

<p>You can now access the server at http://localhost:8000</p>

<a name="description"/>
<h3>Description</h3>

<p>This is a website for real estate agency. It could be used to display multiple
real estate properties, testimonials, real estate agents, contact info, about page etc.</p>

<p>It has support for two languages: English and Croatian.</p>

<p>This website also has a CMS system. So admin can log-in and change the content of the site. Using CMS admin can add/edit/delete properties, agents, testimonials and contact information.</p>

<p>Here is a link to <a href="http://real-estate-site.lukabiskupic.com">DEMO</a>. Unfortunately, you can't access CMS on live demo because anyone could potentially change something on the website and add something inappropriate. If you want to see CMS you will have to install project locally.</p>

<p>On home page, you can see property images in carousel, services that agency provides, few properties, agents and testimonials. There are separate pages for list of all properties and agents.</p>

<p>You also have an option to filter all properties based on multiple factors like: number of beds, city, price etc. <i>(If you try to filter this results on the demo I recommend to choose maximum of 2 options because if you choose more options you will probably get no results since there are only 10 properties in the database)</i></p>

<p>I used Laravel framework to build this website. I also used HTML, CSS, jQuery, Bootstrap. Laravel translatable package was used to make site support multiple languages.</p>

<a name="HowTo"></a>
<h3>How to use this website</h3>

<p>This section has two parts. First part explains how to use the website (this part will be shot because most things are self explanatory) and the second part explains how to use the CMS.</p>

<a name="website"></a>
<h4>Website</h4>

<p>In this section I will only mention how to use filter functionality and relation between agents and properties. Other things on the website are obvious and not worth explaining.</p>

<p><b>Filter properties.</b> When you go to see list of all properties by clicking on the property link in navigation bar, you will see 6 properties on each page. Above those images you will see an option to select All, Active or Sold.</p>

![image that shows filter option](https://github.com/LukaBis/ReadmeImages/blob/main/SmallFilterCircle.png?raw=true)

<p>Each property can have one of two statuses: active or sold. If you click Active, only active properties will be shown. In case you click Sold, only sold properties will be shown. Otherwise you will see all properties.</p>

<p>If you click on search icon in navigation bar you will see a search form. It enables you to search properties based on multiple conditions.</p>

![image that shows filter option](https://github.com/LukaBis/ReadmeImages/blob/main/filter.png?raw=true)

<p><b>Connection between agents and properties.</b> Each <b>agent is responsible for multiple properties</b>(in some cases its 3 properties, sometimes just one, sometimes none).</p>

<p>When you click on agent and you see all data about to that agent, at the bottom of the page you will see all properties that belong to that agent.</p>

![agent's properties](https://github.com/LukaBis/ReadmeImages/blob/main/agents_properties.png?raw=true)

<p>When you click on property and see all data about some property, at the bottom of the page you will see agent that is responsible for that property.</p>

<a name="cms"></a>
<h4>CMS</h4>

<p>CMS is used by the admin of the site. He/she can change contact information, content of the about-page. CMS also allows you to add, edit or delete properties, agents and testimonials.</p>

<p>If you cloned the project to your local machine and you want to use CMS, password is 123456789 and email is admin@email.com . You can access CMS by going to <b>/login</b> route or just click Admin link in the footer.</p>

![cms](https://github.com/LukaBis/ReadmeImages/blob/main/cms.png?raw=true)

<p>The way you work with property data is very similar to the way you would manipulate agent data, testimonial data, contact data etc. So I will only breakdown how to add/edit/delete properties and the rest is very similar.</p>

<p>So when you click on <b>properties</b>, you will see a table of properties and property data. Last column contains a link to a page that displays single property. It looks like this</p>

![single property](https://github.com/LukaBis/ReadmeImages/blob/main/single.png?raw=true)

<p>This page allows you to see and modify some property data. You can change street name, number of beds, property's agent, property's status (active/sold). You can also change property's amenities etc.</p>

<p>Each property has one vertical image. Vertical image is displayed on property-grid (list of <i>all</i> properties). Property has only one vertical image, but multiple horizontal images that are displayed in carousel.</p>

<p>CMS allows you to change vertical image. It also allows you to delete or add horizontal images. Each image file upload has recommended image sizes:</p>

![image size](https://github.com/LukaBis/ReadmeImages/blob/main/imagesizeCircuit.png?raw=true)

<p>If you want to add new property, you have to click on Add Property and fill the form. You also have to add images of that property and then click "Save property".</p>

<p>Licensed under the <a href="https://github.com/LukaBis/real-estate-site/blob/main/LICENSE">MIT License</a></p>
