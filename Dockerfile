FROM openjdk:22-slim

COPY entrypoint.sh /script/entrypoint.sh

CMD ["/script/entrypoint.sh"]