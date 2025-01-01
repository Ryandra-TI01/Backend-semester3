const { body, validationResult } = require('express-validator');

const validateStudent = [
  body('nama').notEmpty().withMessage('Nama is required'),
  body('email').isEmail().withMessage('Invalid email format'),
  body('nim').isNumeric().notEmpty().withMessage('NIM is required'),
  body('jurusan').notEmpty().withMessage('Jurusan is required'),
  (req, res, next) => {
    const errors = validationResult(req);
    if (!errors.isEmpty()) {
      return res.status(400).json({ errors: errors.array() });
    }
    next();
  },
];

module.exports = {validateStudent};
