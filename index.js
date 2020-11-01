import express from 'express';
import base_routes from './routes/index';
import dotenv from 'dotenv';

// .env config connection
dotenv.config();

// express app initialization
const app = express();
const port = process.env.PORT || 5000;

// Middlewares connection
app.use(express.json());
app.use(express.urlencoded({extended: false}));

app.use('/base/', base_routes);

// start app
app.listen(port, () => {
    console.log(`Listening port ${port}`)
});