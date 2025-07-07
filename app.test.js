// File: app.test.js
const request = require('supertest');
const app = require('./app');

describe('API Mendalami Rasa (Perasaan)', () => {
  it('GET / -> harus merespon dengan status 200 dan pesan selamat datang', async () => {
    const response = await request(app).get('/');
    expect(response.statusCode).toBe(200);
    expect(response.text).toContain('Selamat Datang di API Mendalami Rasa (Perasaan)!');
  });

  it('GET /perasaan -> harus merespon dengan array berisi nama-nama perasaan', async () => {
    const response = await request(app).get('/perasaan');
    expect(response.statusCode).toBe(200);
    expect(response.body).toEqual(expect.arrayContaining(['senang', 'sedih', 'marah', 'semangat']));
  });

  it('GET /perasaan/senang -> harus merespon dengan detail perasaan senang', async () => {
    const response = await request(app).get('/perasaan/senang');
    expect(response.statusCode).toBe(200);
    expect(response.body.nama).toBe('Senang');
  });

  it('GET /perasaan/bingung -> harus merespon dengan status 404', async () => {
    const response = await request(app).get('/perasaan/bingung');
    expect(response.statusCode).toBe(404);
    expect(response.body.message).toBe('Perasaan tidak dikenali');
  });
});