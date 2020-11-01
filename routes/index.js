import express from 'express';

const router = express.Router();

// Get query handler
router.get('/', (req, res) => {
    res.send("Hello");
});

export default router;