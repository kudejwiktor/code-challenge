.PHONY: up build

up:
	$(MAKE) -C ./boats-service build

build: up
