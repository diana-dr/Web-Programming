using System;
using System.Threading.Tasks;

namespace lab9.Service
{
    public interface IAuthenticationService
    {
        string LoginUser(string username, string password);
        Task<string> RegisterUser(string username, string password);
    }
}
