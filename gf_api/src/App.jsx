import React from 'react';
import RegisterForm from './RegisterForm';
import { Container, Grid } from '@material-ui/core';

function App() {
  return (
    <Container>
      <Grid container spacing={3}>
        <Grid item xs={12} md={6}>
          <RegisterForm />
        </Grid>
      </Grid>
    </Container>
  );
}

export default App;
