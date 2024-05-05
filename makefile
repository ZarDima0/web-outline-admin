PHP_SERVICE = php
NGINX_SERVICE = nginx
MYSQL_SERVICE = mysql

COMPOSE_FILE = docker-compose.yml
UP_FLAGS = --build
DOWN_FLAGS = --remove-orphans

# Target to stop and remove services
down:
	@echo "Stopping and removing services..."
	docker-compose -f $(COMPOSE_FILE) $(DOWN_FLAGS)

# Target to rebuild services
rebuild:
	@echo "Rebuilding services..."
	docker-compose -f $(COMPOSE_FILE) up --build

# Target to run a specific service
run:
	@echo "Running a specific service..."
	docker-compose -f $(COMPOSE_FILE) up -d

# Target to stop a specific service
stop:
	@echo "Stopping a specific service..."
	docker-compose -f $(COMPOSE_FILE) stop $(SERVICE_NAME)

# Target to restart a specific service
restart:
	@echo "Restarting a specific service..."
	docker-compose -f $(COMPOSE_FILE) restart $(SERVICE_NAME)

# Target to logs of a specific service
logs:
	@echo "Viewing logs of a specific service..."
	docker-compose -f $(COMPOSE_FILE) logs $(SERVICE_NAME)
