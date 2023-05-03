import { BrowserRouter, Routes, Route } from 'react-router-dom'
import Home from './Home/index'
import RegisterForm from './auth/Register'
import './App.css'

function App() {

  return (
    <>
      <BrowserRouter>
        <Routes>
          <Route
            path='/'
            element={
                <Home />
            }
          />
        </Routes>
      </BrowserRouter>
      <BrowserRouter>
        <Routes>
          <Route
            path='/register'
            element={
                <RegisterForm />
            }
          />
        </Routes>
      </BrowserRouter>
    </>
  )
}

export default App
