# database init, supports mysql too
database=mysql
spring.datasource.schema=classpath*:db/${database}/schema.sql
spring.datasource.data=classpath*:db/${database}/data.sql

# Web
spring.thymeleaf.mode=HTML

# JPA
spring.jpa.hibernate.ddl-auto=none
spring.jpa.open-in-view=false

# spring.h2.console.enabled=true
# spring.datasource.url=jdbc:h2:mem:testdb

spring.datasource.url=${MYSQL_URL:jdbc:mysql://127.0.0.1:3307/petclinic}
spring.datasource.username=${MYSQL_USER:petclinic}
spring.datasource.password=${MYSQL_PASS:petclinic}
# SQL is written to be idempotent so this is safe
spring.datasource.initialization-mode=always

# Internationalization
spring.messages.basename=messages/messages

# Actuator
management.endpoints.web.exposure.include=*

# Logging
logging.level.org.springframework=INFO
# logging.level.org.springframework.web=DEBUG
# logging.level.org.springframework.context.annotation=TRACE

# Maximum time static resources should be cached
spring.resources.cache.cachecontrol.max-age=12h
