
<h1>Products API </h1> 

<h2>
    Installation
</h2>
 -Clone The Repo
 
 ```
 git clone https://github.com/hossammohammed72/productsAPI.git 
 ```
 
 -run docker compose 
 
 ```
 docker-compose up -d
```

***Congrats you succesfully installed the repo*** 

<h2>
    OverView 
</h2> 
The Design main idea was to make it supereasy to add new json data providers and also add filters while delivering good performnance and code quality. 

***Adding  new Data provider e.g DataProviderZ***  

1. move your data file to  storage/dataPorviders/ 
2. move your schema file to storage/providerFormatters/ (you can find example for the schema file inside porviderFormatters like (ProviderXForammter.json) 
3. in config/json-data-sources.php Add the Data of your provider to the Providers Array 
And that's done you sucessfully added another DataProvider to the project.  

