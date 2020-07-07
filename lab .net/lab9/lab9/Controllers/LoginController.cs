using lab9.DTO;
using lab9.Service;
using Microsoft.AspNetCore.Mvc;

namespace lab9.Controllers
{
    [Route("api/login")]
    [ApiController]
    public class LoginController : ControllerBase
    {
        private readonly IAuthenticationService authenticationService;

        public LoginController(IAuthenticationService authenticationService)
        {
            this.authenticationService = authenticationService;
        }

        [HttpPost]
        public ActionResult<string> Login(UserInputDTO credentials)
        {
            string token = authenticationService.LoginUser(credentials.Username, credentials.Password);

            if (token == null)
            {
                return BadRequest("Invalid credentials!");
            }

            return Ok(token);
        }
    }
}
