import Axios from "axios";

const axios = Axios.create({
  baseURL: "http::localhost:8000",
  withCredentials: true,
  withXSRFToken: true,
  xsrfCookieName: "XSRF-TOKEN",
  xsrfHeaderName: "X-XSRF-TOKEN",
  headers: {
    Accept: "Application/json",
  },
});

axios.defaults.headers.common["Cookie"] = "SameSite=None";
export default axios;
