start:
	cd docker && docker-compose up

clean:
	cd docker && docker-compose down

restart:
	cd docker && docker-compose restart

rebuild:
	cd docker && docker-compose up --build