#Deploying containerized Wordpress

1. shared volume for `mysql-data` and `wp-content/uploads`
2. Starts from Debain base image
3. Stock plugins are copied during docker build

On your bash shell run the below
```
./build.sh
docker-compose up -d
```

Point your browser to localhost:8000
If it is a first time, set the Sitename and admin username and password

To shutdown run the below

```
docker-compose down
```

To login into the container


```
docker ps
```

Copy the container id then

```
docker exec -it <container_id> bash
```

To run wp-cli, get the docker container id of opentxt:v1 and then

```
docker exec -it <container id>  bash
cd /var/www/wordpress
wp plugin list --allow-root # an example command
```


