# Menggunakan base image Node.js versi 18-alpine (ringan)
FROM node:18-alpine

# Menentukan direktori kerja di dalam container
WORKDIR /app

# Salin package.json dan package-lock.json untuk install dependencies
COPY package*.json ./

# Install hanya dependencies production untuk menjaga image tetap kecil
RUN npm install --production

# Salin semua file proyek ke dalam direktori kerja di container
COPY . .

# Memberi tahu Docker bahwa container akan listen di port 3000
EXPOSE 3000

# Perintah default yang akan dijalankan saat container dimulai
CMD [ "node", "app.js" ]