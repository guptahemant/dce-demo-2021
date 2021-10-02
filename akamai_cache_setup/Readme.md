# Step 1
Remove vary header
![Remove vary](https://github.com/guptahemant/dce-demo-2021/blob/master/akamai_cache_setup/remove_vary.png)

# Step 2
Define paths which will not be cached.
![Alt text](https://github.com/guptahemant/dce-demo-2021/blob/master/akamai_cache_setup/html_caching_1.png)

# Step 3
Define paths for which html caching will apply
![Alt text](https://github.com/guptahemant/dce-demo-2021/blob/master/akamai_cache_setup/html_caching_2_filter_extension.png)

# Step 4
If session cookie does not exist then start caching
![Alt text](https://github.com/guptahemant/dce-demo-2021/blob/master/akamai_cache_setup/html_caching_3_cache_html.png)

# Step 5
Configure cookies for which cache should vary
![Alt text](https://github.com/guptahemant/dce-demo-2021/blob/master/akamai_cache_setup/html_caching_4_cookie_variation.png)

# Step 6
In Session cookie exists the bypass caching
![Alt text](https://github.com/guptahemant/dce-demo-2021/blob/master/akamai_cache_setup/html_caching_5_bypass_cache.png)

# Step 7
Configure the file identifier tag for purging file paths
![Alt text](https://github.com/guptahemant/dce-demo-2021/blob/master/akamai_cache_setup/file_cache_tag.png)
