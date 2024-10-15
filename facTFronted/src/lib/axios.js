import Axios from "axios";

const axios = Axios.create({
  baseURL: "http::localhost:8000",
  withCredentials: true,
  xsrfCookieName: "XSRF-TOKEN",
  xsrfHeaderName: "X-XSRF-TOKEN",
  headers: {
    Accept: "Application/json",
  },
});

export default axios;
