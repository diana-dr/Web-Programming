using System;
using System.Collections.Generic;
using System.Security.Principal;

namespace lab9.Models
{
    public class User
    {
        public User() {}

        public User(string username, string password)
        {
            this.Username = username;
            this.Password = password;
        }

        public int Id { get; set; }
        public string Username { get; set; }
        public string Password { get; set; }

        public virtual List<Guest> Guests { get; set; }
    }
}
