FROM openjdk:11

COPY entrypoint.sh /script/entrypoint.sh

CMD ["/script/entrypoint.sh"]