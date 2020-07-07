using System;
using lab9.Models;

namespace lab9.DTO
{
    public class UserOutputDTO
    {
        public long Id { get; set; }
        public string Username { get; set; }

        public UserOutputDTO(User user)
        {
            Id = user.Id;
            Username = user.Username;
        }
    }
}