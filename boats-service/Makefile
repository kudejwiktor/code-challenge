.PHONY: ssh fix-permissions all composer-install up build

ssh:
	@docker-compose exec boats-service sh

composer-install:
	@sh composer install

up:
	@docker-compose up -d --build ;\
	docker-compose logs -f || exit 0 ;\

build: composer-install fix-permissions up

