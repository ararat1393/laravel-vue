import axios from "axios";
axios.defaults.headers.common.Authorization = `Bearer ${localStorage.getItem('access-token')}`
/**
 *
 * @param payload
 * @returns {Promise<unknown>}
 */
export const loginUser = function (payload){
  return new Promise((resolve, reject) => {
    axios.post('auth/login',payload)
      .then( (response) => {
        return resolve(response)
      })
      .catch( (error) => {
        return reject(error)
      });
  })
}

export const registerUser = function (payload){
  return new Promise((resolve, reject) => {
    axios.post('auth/register',payload)
      .then( response => resolve(response))
      .catch( error => reject(error));
  })
}

/**
 *
 * @returns {Promise<unknown>}
 */
export const getAuthUser = function (){
  return new Promise((resolve, reject) => {
    axios.get('auth/user')
      .then(response => resolve(response))
      .catch(error => reject(error));
  })
}

/**
 *
 * @returns {Promise<unknown>}
 */
export const logoutUser = function (){
  return new Promise((resolve, reject) => {
    axios.post('auth/logout')
      .then(response => resolve(response))
      .catch(error => reject(error));
  })
}
