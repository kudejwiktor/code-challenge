FROM node:lts-alpine as build-stage

WORKDIR /web

COPY package*.json ./

RUN npm install

COPY . .

RUN npm run build


FROM nginx:alpine as production-stage

COPY --from=build-stage /web/dist /usr/share/nginx/html

CMD ["nginx", "-g", "daemon off;"]