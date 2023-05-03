import React, { useState } from 'react';
import { TextField, Button, Grid, Paper } from '@material-ui/core';
import axios from 'axios';

function RegisterForm() {
  const [name, setName] = useState('');
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [confirmPassword, setConfirmPassword] = useState('');
  const [error, setError] = useState(null);

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      const response = await axios.post('http://127.0.0.1:8000/api/register', {
        name,
        email,
        password,
        password_confirmation: confirmPassword,
      });
      console.log(response.data);
      // handle success or failure
    } catch (err) {
      setError(err.message);
    }
  };

  return (
    <Grid container spacing={2} justify="center">
      <Grid item xs={12} sm={8} md={6} lg={4}>
        <Paper style={{ padding: '20px' }}>
          <form onSubmit={handleSubmit}>
            <TextField
              label="Name"
              value={name}
              onChange={(e) => setName(e.target.value)}
              fullWidth
              required
            />
            <TextField
              label="Email"
              value={email}
              onChange={(e) => setEmail(e.target.value)}
              fullWidth
              required
            />
            <TextField
              label="Password"
              value={password}
              onChange={(e) => setPassword(e.target.value)}
              type="password"
              fullWidth
              required
            />
            <TextField
              label="Confirm Password"
              value={confirmPassword}
              onChange={(e) => setConfirmPassword(e.target.value)}
              type="password"
              fullWidth
              required
            />
            <Button
              type="submit"
              variant="contained"
              color="primary"
              fullWidth
              style={{ marginTop: '20px' }}
              onClick={handleSubmit}

            >
              Register
            </Button>
            {error && <p>{error}</p>}
          </form>
        </Paper>
      </Grid>
    </Grid>
  );
}

export default RegisterForm;
